using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'cutTheTree' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY data
     *  2. 2D_INTEGER_ARRAY edges
     */

    public static int cutTheTree(List<int> data, List<List<int>> edges)
    {
        int n = data.Count;

        List<List<int>> tree = new List<List<int>>(new List<int>[n]);
        for (int i = 0; i < n; i++)
        {
            tree[i] = new List<int>();
        }

        foreach (var edge in edges)
        {
            int u = edge[0] - 1;
            int v = edge[1] - 1;
            tree[u].Add(v);
            tree[v].Add(u);
        }

        int totalSum = data.Sum();

        bool[] visited = new bool[n];
        int[] subtreeSum = new int[n];

        int DFS(int node)
        {
            visited[node] = true;
            int currentSum = data[node];

            foreach (int neighbor in tree[node])
            {
                if (!visited[neighbor])
                {
                    currentSum += DFS(neighbor);
                }
            }

            subtreeSum[node] = currentSum;
            return currentSum;
        }

        DFS(0);

        int minDifference = int.MaxValue;
        for (int i = 1; i < n; i++)
        {
            int partSum = subtreeSum[i];
            int remainingSum = totalSum - partSum;
            minDifference = Math.Min(minDifference, Math.Abs(partSum - remainingSum));
        }

        return minDifference;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> data = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(dataTemp => Convert.ToInt32(dataTemp)).ToList();

        List<List<int>> edges = new List<List<int>>();

        for (int i = 0; i < n - 1; i++)
        {
            edges.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(edgesTemp => Convert.ToInt32(edgesTemp)).ToList());
        }

        int result = Result.cutTheTree(data, edges);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
