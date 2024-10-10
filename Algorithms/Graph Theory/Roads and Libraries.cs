using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'roadsAndLibraries' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER c_lib
     *  3. INTEGER c_road
     *  4. 2D_INTEGER_ARRAY cities
     */

    public static long roadsAndLibraries(int n, int c_lib, int c_road, List<List<int>> cities)
    {
        if (c_lib <= c_road)
        {
            return (long)n * c_lib;
        }

        List<int>[] graph = new List<int>[n + 1];
        for (int i = 0; i <= n; i++)
        {
            graph[i] = new List<int>();
        }

        foreach (var road in cities)
        {
            int city1 = road[0];
            int city2 = road[1];
            graph[city1].Add(city2);
            graph[city2].Add(city1);
        }

        bool[] visited = new bool[n + 1];
        long totalCost = 0;

        void DFS(int node, out int size)
        {
            size = 0;
            Stack<int> stack = new Stack<int>();
            stack.Push(node);

            while (stack.Count > 0)
            {
                int current = stack.Pop();
                if (!visited[current])
                {
                    visited[current] = true;
                    size++;

                    foreach (int neighbor in graph[current])
                    {
                        if (!visited[neighbor])
                        {
                            stack.Push(neighbor);
                        }
                    }
                }
            }
        }

        for (int city = 1; city <= n; city++)
        {
            if (!visited[city])
            {
                DFS(city, out int componentSize);
                totalCost += c_lib + (componentSize - 1) * c_road;
            }
        }

        return totalCost;
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

            int c_lib = Convert.ToInt32(firstMultipleInput[2]);
            int c_road = Convert.ToInt32(firstMultipleInput[3]);

            List<List<int>> cities = new List<List<int>>();

            for (int i = 0; i < m; i++)
            {
                cities.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(citiesTemp => Convert.ToInt32(citiesTemp)).ToList());
            }

            long result = Result.roadsAndLibraries(n, c_lib, c_road, cities);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
