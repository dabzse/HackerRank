using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'prims' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. 2D_INTEGER_ARRAY edges
     *  3. INTEGER start
     */

    public static int prims(int n, List<List<int>> edges, int start)
    {
        Dictionary<int, List<(int, int)>> adj = new Dictionary<int, List<(int, int)>>();

        for (int i = 1; i <= n; i++)
        {
            adj[i] = new List<(int, int)>();
        }

        foreach (var edge in edges)
        {
            int u = edge[0];
            int v = edge[1];
            int w = edge[2];
            adj[u].Add((v, w));
            adj[v].Add((u, w));
        }

        SortedSet<(int weight, int node)> pq = new SortedSet<(int, int)>();
        pq.Add((0, start));

        bool[] visited = new bool[n + 1];
        int mstWeight = 0;

        while (pq.Count > 0)
        {
            var current = pq.First();
            pq.Remove(current);

            int weight = current.weight;
            int node = current.node;

            if (visited[node]) continue;

            mstWeight += weight;
            visited[node] = true;

            foreach (var neighbor in adj[node])
            {
                int nextNode = neighbor.Item1;
                int nextWeight = neighbor.Item2;

                if (!visited[nextNode])
                {
                    pq.Add((nextWeight, nextNode));
                }
            }
        }

        return mstWeight;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int m = Convert.ToInt32(firstMultipleInput[1]);

        List<List<int>> edges = new List<List<int>>();

        for (int i = 0; i < m; i++)
        {
            edges.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(edgesTemp => Convert.ToInt32(edgesTemp)).ToList());
        }

        int start = Convert.ToInt32(Console.ReadLine().Trim());
        int result = Result.prims(n, edges, start);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
