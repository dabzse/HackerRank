using System;
using System.Collections.Generic;
using System.Collections;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'connectedCell' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts 2D_INTEGER_ARRAY matrix as parameter.
     */

    public static int connectedCell(List<List<int>> matrix)
    {
        int max = 0;
        int numRows = matrix.Count;
        int numColumns = matrix[0].Count;
        int[,] visited = new int[numRows, numColumns];

        int[][] directions = new int[][]
        {
            new int[] {-1, 0},
            new int[] {1, 0},
            new int[] {0, -1},
            new int[] {0, 1},
            new int[] {-1, -1},
            new int[] {-1, 1},
            new int[] {1, -1},
            new int[] {1, 1}
        };

        for (int i = 0; i < numRows; i++)
        {
            for (int j = 0; j < numColumns; j++)
            {
                if (matrix[i][j] == 1 && visited[i, j] == 0)
                {
                    visited[i, j] = 1;
                    Queue<int[]> queue = new Queue<int[]>();
                    queue.Enqueue(new int[] { i, j });
                    int count = 1;

                    while (queue.Count > 0)
                    {
                        int[] current = queue.Dequeue();
                        int x = current[0];
                        int y = current[1];

                        foreach (var dir in directions)
                        {
                            int newX = x + dir[0];
                            int newY = y + dir[1];

                            if (newX >= 0 && newX < numRows && newY >= 0 && newY < numColumns && matrix[newX][newY] == 1 && visited[newX, newY] == 0)
                            {
                                visited[newX, newY] = 1;
                                queue.Enqueue(new int[] { newX, newY });
                                count++;
                            }
                        }
                    }
                    max = Math.Max(max, count);
                }
            }
        }

        return max;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());
        int m = Convert.ToInt32(Console.ReadLine().Trim());

        List<List<int>> matrix = new List<List<int>>();

        for (int i = 0; i < n; i++)
        {
            matrix.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(matrixTemp => Convert.ToInt32(matrixTemp)).ToList());
        }

        int result = Result.connectedCell(matrix);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
