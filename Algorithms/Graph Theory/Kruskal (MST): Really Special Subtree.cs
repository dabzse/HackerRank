using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;


/*
 * Complete the 'kruskals' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts WEIGHTED_INTEGER_GRAPH g as parameter.
 */

/*
 * For the weighted graph, <name>:
 *
 * 1. The number of nodes is <name>Nodes.
 * 2. The number of edges is <name>Edges.
 * 3. An edge exists between <name>From[i] and <name>To[i]. The weight of the edge is <name>Weight[i].
 *
 */

class UnionFind
{
    private int[] parent;
    private int[] rank;

    public UnionFind(int n)
    {
        parent = new int[n];
        rank = new int[n];
        for (int i = 0; i < n; i++)
        {
            parent[i] = i;
            rank[i] = 0;
        }
    }

    public int Find(int u)
    {
        if (parent[u] != u)
        {
            parent[u] = Find(parent[u]);
        }
        return parent[u];
    }

    public void Union(int u, int v)
    {
        int rootU = Find(u);
        int rootV = Find(v);

        if (rootU != rootV)
        {
            if (rank[rootU] > rank[rootV])
            {
                parent[rootV] = rootU;
            }
            else if (rank[rootU] < rank[rootV])
            {
                parent[rootU] = rootV;
            }
            else
            {
                parent[rootV] = rootU;
                rank[rootU]++;
            }
        }
    }
}

class Result
{
    public static int kruskals(int gNodes, List<int> gFrom, List<int> gTo, List<int> gWeight)
    {
        List<Tuple<int, int, int>> edges = new List<Tuple<int, int, int>>();

        // Prepare the list of edges
        for (int i = 0; i < gFrom.Count; i++)
        {
            edges.Add(Tuple.Create(gWeight[i], gFrom[i] - 1, gTo[i] - 1));
        }

        edges.Sort((a, b) => a.Item1.CompareTo(b.Item1));

        UnionFind uf = new UnionFind(gNodes);
        int mstWeight = 0;
        int mstEdges = 0;

        foreach (var edge in edges)
        {
            int weight = edge.Item1;
            int u = edge.Item2;
            int v = edge.Item3;

            if (uf.Find(u) != uf.Find(v))
            {
                uf.Union(u, v);
                mstWeight += weight;
                mstEdges++;

                if (mstEdges == gNodes - 1)
                {
                    break;
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

        string[] gNodesEdges = Console.ReadLine().TrimEnd().Split(' ');

        int gNodes = Convert.ToInt32(gNodesEdges[0]);
        int gEdges = Convert.ToInt32(gNodesEdges[1]);

        List<int> gFrom = new List<int>();
        List<int> gTo = new List<int>();
        List<int> gWeight = new List<int>();

        for (int i = 0; i < gEdges; i++)
        {
            string[] gFromToWeight = Console.ReadLine().TrimEnd().Split(' ');

            gFrom.Add(Convert.ToInt32(gFromToWeight[0]));
            gTo.Add(Convert.ToInt32(gFromToWeight[1]));
            gWeight.Add(Convert.ToInt32(gFromToWeight[2]));
        }

        int res = Result.kruskals(gNodes, gFrom, gTo, gWeight);

        // Write your code here.
        textWriter.WriteLine(res);

        textWriter.Flush();
        textWriter.Close();
    }
}
