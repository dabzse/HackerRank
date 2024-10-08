using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'bfs' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER m
     *  3. 2D_INTEGER_ARRAY edges
     *  4. INTEGER s
     */

    public static List<int> bfs(int n, int m, List<List<int>> edges, int s)
    {
        List<List<int>> graph = new List<List<int>>(new List<int>[n + 1]);
        for (int i = 1; i <= n; i++)
        {
            graph[i] = new List<int>();
        }

        foreach (var edge in edges)
        {
            int u = edge[0];
            int v = edge[1];
            graph[u].Add(v);
            graph[v].Add(u);
        }

        int[] distances = Enumerable.Repeat(-1, n + 1).ToArray();
        distances[s] = 0;

        Queue<int> queue = new Queue<int>();
        queue.Enqueue(s);

        while (queue.Count > 0)
        {
            int node = queue.Dequeue();

            foreach (int neighbor in graph[node])
            {
                if (distances[neighbor] == -1)
                {
                    distances[neighbor] = distances[node] + 6;
                    queue.Enqueue(neighbor);
                }
            }
        }

        List<int> result = new List<int>();
        for (int i = 1; i <= n; i++)
        {
            if (i != s)
            {
                result.Add(distances[i]);
            }
        }

        return result;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int q = Convert.ToInt32(Console.ReadLine().Trim());

        for (int qItr = 0; qItr < q; qItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int n = Convert.ToInt32(firstMultipleInput[0]);
            int m = Convert.ToInt32(firstMultipleInput[1]);

            List<List<int>> edges = new List<List<int>>();

            for (int i = 0; i < m; i++)
            {
                edges.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(edgesTemp => Convert.ToInt32(edgesTemp)).ToList());
            }

            int s = Convert.ToInt32(Console.ReadLine().Trim());

            List<int> result = Result.bfs(n, m, edges, s);

            textWriter.WriteLine(String.Join(" ", result));
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
