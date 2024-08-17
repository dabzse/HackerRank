using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'printShortestPath' function below.
     *
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER i_start
     *  3. INTEGER j_start
     *  4. INTEGER i_end
     *  5. INTEGER j_end
     */

    public static void printShortestPath(int n, int i_start, int j_start, int i_end, int j_end)
    {
        // Print the distance along with the sequence of moves.
        var directions = new (int di, int dj, string move)[]
        {
            (-2, -1, "UL"),
            (-2, 1, "UR"),
            (0, 2, "R"),
            (2, 1, "LR"),
            (2, -1, "LL"),
            (0, -2, "L")
        };

        var queue = new Queue<(int, int, List<string>)>();
        queue.Enqueue((i_start, j_start, new List<string>()));
        var visited = new HashSet<string>();
        visited.Add($"{i_start},{j_start}");

        while (queue.Count > 0)
        {
            var (i, j, path) = queue.Dequeue();

            if (i == i_end && j == j_end)
            {
                Console.WriteLine(path.Count);
                Console.WriteLine(string.Join(" ", path));
                return;
            }

            foreach (var (di, dj, move) in directions)
            {
                int new_i = i + di;
                int new_j = j + dj;
                string new_position = $"{new_i},{new_j}";

                if (new_i >= 0 && new_i < n && new_j >= 0 && new_j < n && !visited.Contains(new_position))
                {
                    var new_path = new List<string>(path) { move };
                    queue.Enqueue((new_i, new_j, new_path));
                    visited.Add(new_position);
                }
            }
        }

        Console.WriteLine("Impossible");
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int n = Convert.ToInt32(Console.ReadLine().Trim());

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int i_start = Convert.ToInt32(firstMultipleInput[0]);
        int j_start = Convert.ToInt32(firstMultipleInput[1]);

        int i_end = Convert.ToInt32(firstMultipleInput[2]);
        int j_end = Convert.ToInt32(firstMultipleInput[3]);

        Result.printShortestPath(n, i_start, j_start, i_end, j_end);
    }
}