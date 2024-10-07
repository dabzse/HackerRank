using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'quickestWayUp' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. 2D_INTEGER_ARRAY ladders
     *  2. 2D_INTEGER_ARRAY snakes
     */

    public static int quickestWayUp(List<List<int>> ladders, List<List<int>> snakes)
    {
        int[] board = new int[101];
        for (int i = 0; i <= 100; i++)
        {
            board[i] = i;
        }

        foreach (var ladder in ladders)
        {
            int start = ladder[0];
            int end = ladder[1];
            board[start] = end;
        }

        foreach (var snake in snakes)
        {
            int start = snake[0];
            int end = snake[1];
            board[start] = end;
        }

        Queue<(int currentSquare, int moves)> queue = new Queue<(int, int)>();
        bool[] visited = new bool[101];
        queue.Enqueue((1, 0));
        visited[1] = true;

        while (queue.Count > 0)
        {
            var (currentSquare, moves) = queue.Dequeue();

            if (currentSquare == 100)
            {
                return moves;
            }

            for (int roll = 1; roll <= 6; roll++)
            {
                int nextSquare = currentSquare + roll;

                if (nextSquare <= 100 && !visited[nextSquare])
                {
                    visited[nextSquare] = true;
                    queue.Enqueue((board[nextSquare], moves + 1));
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
            int n = Convert.ToInt32(Console.ReadLine().Trim());

            List<List<int>> ladders = new List<List<int>>();

            for (int i = 0; i < n; i++)
            {
                ladders.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(laddersTemp => Convert.ToInt32(laddersTemp)).ToList());
            }

            int m = Convert.ToInt32(Console.ReadLine().Trim());

            List<List<int>> snakes = new List<List<int>>();

            for (int i = 0; i < m; i++)
            {
                snakes.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(snakesTemp => Convert.ToInt32(snakesTemp)).ToList());
            }

            int result = Result.quickestWayUp(ladders, snakes);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
