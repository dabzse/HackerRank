using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;


class Solution
{
    // Complete the evenForest function below.
    static int evenForest(int t_nodes, int t_edges, List<int> t_from, List<int> t_to)
    {
        List<int>[] adj = new List<int>[t_nodes + 1];
        for (int i = 0; i <= t_nodes; i++)
        {
            adj[i] = new List<int>();
        }

        for (int i = 0; i < t_edges; i++)
        {
            adj[t_from[i]].Add(t_to[i]);
            adj[t_to[i]].Add(t_from[i]);
        }

        int[] subtreeSize = new int[t_nodes + 1];
        bool[] visited = new bool[t_nodes + 1];


        int dfs(int node)
        {
            visited[node] = true;
            int size = 1;

            foreach (var neighbor in adj[node])
            {
                if (!visited[neighbor])
                {
                    size += dfs(neighbor);
                }
            }

            subtreeSize[node] = size;
            return size;
        }

        dfs(1);

        int cuttableEdges = 0;
        for (int i = 2; i <= t_nodes; i++)
        {
            if (subtreeSize[i] % 2 == 0)
            {
                cuttableEdges++;
            }
        }

        return cuttableEdges;
    }

    static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] tNodesEdges = Console.ReadLine().TrimEnd().Split(' ');

        int t_nodes = Convert.ToInt32(tNodesEdges[0]);
        int t_edges = Convert.ToInt32(tNodesEdges[1]);

        List<int> t_from = new List<int>();
        List<int> t_to = new List<int>();

        for (int i = 0; i < t_edges; i++)
        {
            string[] tFromTo = Console.ReadLine().TrimEnd().Split(' ');

            t_from.Add(Convert.ToInt32(tFromTo[0]));
            t_to.Add(Convert.ToInt32(tFromTo[1]));
        }

        int res = evenForest(t_nodes, t_edges, t_from, t_to);

        textWriter.WriteLine(res);
        textWriter.Flush();
        textWriter.Close();
    }
}
