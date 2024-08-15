using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'knightlOnAChessboard' function below.
     *
     * The function is expected to return a 2D_INTEGER_ARRAY.
     * The function accepts INTEGER n as parameter.
     */

    public static List<List<int>> knightlOnAChessboard(int n)
    {
List<List<int>> result = new List<List<int>>();

        for (int i = 1; i < n; i++)
        {
            List<int> row = new List<int>();

            for (int j = 1; j < n; j++)
            {
                int moves = CalculateMoves(n, i, j);
                row.Add(moves);
            }

            result.Add(row);
        }

        return result;
    }

    private static int CalculateMoves(int n, int i, int j)
    {
        int[][] directions = new int[][] {
                                new int[] { i, j },
                                new int[] { i, -j },
                                new int[] { -i, j },
                                new int[] { -i, -j },
                                new int[] { j, i },
                                new int[] { j, -i },
                                new int[] { -j, i },
                                new int[] { -j, -i }
                            };

        Queue<int[]> queue = new Queue<int[]>();
        queue.Enqueue(new int[] { 0, 0 });

        int[,] visited = new int[n, n];
        visited[0, 0] = 1;

        while (queue.Count > 0)
        {
            int[] current = queue.Dequeue();
            int x = current[0];
            int y = current[1];

            if (x == n - 1 && y == n - 1)
            {
                return visited[x, y] - 1;
            }

            foreach (int[] dir in directions)
            {
                int newX = x + dir[0];
                int newY = y + dir[1];

                if (newX >= 0 && newX < n && newY >= 0 && newY < n && visited[newX, newY] == 0)
                {
                    visited[newX, newY] = visited[x, y] + 1;
                    queue.Enqueue(new int[] { newX, newY });
                }
            }
        }

        return -1;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<List<int>> result = Result.knightlOnAChessboard(n);

        textWriter.WriteLine(String.Join("\n", result.Select(x => String.Join(" ", x))));

        textWriter.Flush();
        textWriter.Close();
    }
}
