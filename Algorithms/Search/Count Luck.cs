using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{
    private static int[][] DIRECTIONS = new int[][]
    {
        new int[] {0, 1},
        new int[] {1, 0},
        new int[] {0, -1},
        new int[] {-1, 0}
    };

    /*
     * Complete the 'countLuck' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING_ARRAY matrix
     *  2. INTEGER k
     */
    public static string countLuck(List<string> matrix, int k)
    {
        int n = matrix.Count;
        int m = matrix[0].Length;
        int[] start = new int[2];
        bool[][] visited = new bool[n][];

        for (int i = 0; i < n; i++)
        {
            visited[i] = new bool[m];
            for (int j = 0; j < m; j++)
            {
                if (matrix[i][j] == 'M')
                {
                    start[0] = i;
                    start[1] = j;
                }
            }
        }

        int junctions = Dfs(matrix, start[0], start[1], visited);

        return junctions == k ? "Impressed" : "Oops!";
    }

    private static int Dfs(List<string> matrix, int x, int y, bool[][] visited)
    {
        if (matrix[x][y] == '*')
        {
            return 0;
        }

        visited[x][y] = true;
        int validMoves = 0;

        foreach (var dir in DIRECTIONS)
        {
            int nx = x + dir[0];
            int ny = y + dir[1];

            if (nx >= 0 && nx < matrix.Count && ny >= 0 && ny < matrix[0].Length && matrix[nx][ny] != 'X' && !visited[nx][ny])
            {
                validMoves++;
            }
        }

        int junctions = 0;

        foreach (var dir in DIRECTIONS)
        {
            int nx = x + dir[0];
            int ny = y + dir[1];

            if (nx >= 0 && nx < matrix.Count && ny >= 0 && ny < matrix[0].Length && matrix[nx][ny] != 'X' && !visited[nx][ny])
            {
                int result = Dfs(matrix, nx, ny, visited);
                if (result != -1)
                {
                    junctions += result;
                    if (validMoves > 1)
                    {
                        junctions++;
                    }
                    return junctions;
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

        int t = Convert.ToInt32(Console.ReadLine().Trim());

        for (int tItr = 0; tItr < t; tItr++)
        {
            string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

            int n = Convert.ToInt32(firstMultipleInput[0]);
            int m = Convert.ToInt32(firstMultipleInput[1]);

            List<string> matrix = new List<string>();

            for (int i = 0; i < n; i++)
            {
                string matrixItem = Console.ReadLine();
                matrix.Add(matrixItem);
            }

            int k = Convert.ToInt32(Console.ReadLine().Trim());

            string result = Result.countLuck(matrix, k);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
