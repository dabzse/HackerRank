using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'twoPluses' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts STRING_ARRAY grid as parameter.
     */

    public static int twoPluses(List<string> grid)
    {
        int n = grid.Count;
        int m = grid[0].Length;

        bool IsValidPlus(int r, int c, int size)
        {
            if (r - size < 0 || r + size >= n || c - size < 0 || c + size >= m)
                return false;
            for (int i = 0; i <= size; i++)
            {
                if (grid[r - i][c] != 'G' || grid[r + i][c] != 'G' || grid[r][c - i] != 'G' || grid[r][c + i] != 'G')
                    return false;
            }
            return true;
        }

        var pluses = new List<(int r, int c, int size)>();
        for (int r = 0; r < n; r++)
        {
            for (int c = 0; c < m; c++)
            {
                int size = 0;
                while (IsValidPlus(r, c, size))
                {
                    pluses.Add((r, c, size));
                    size++;
                }
            }
        }

        HashSet<(int, int)> GetPlusCells(int r, int c, int size)
        {
            var cells = new HashSet<(int, int)>();
            for (int i = 0; i <= size; i++)
            {
                cells.Add((r - i, c));
                cells.Add((r + i, c));
                cells.Add((r, c - i));
                cells.Add((r, c + i));
            }
            return cells;
        }

        int maxProduct = 0;

        for (int i = 0; i < pluses.Count; i++)
        {
            var (r1, c1, size1) = pluses[i];
            int area1 = 1 + size1 * 4;
            var plus1Cells = GetPlusCells(r1, c1, size1);

            for (int j = i + 1; j < pluses.Count; j++)
            {
                var (r2, c2, size2) = pluses[j];
                int area2 = 1 + size2 * 4;
                var plus2Cells = GetPlusCells(r2, c2, size2);

                if (!plus1Cells.Overlaps(plus2Cells))
                {
                    maxProduct = Math.Max(maxProduct, area1 * area2);
                }
            }
        }

        return maxProduct;
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

        List<string> grid = new List<string>();

        for (int i = 0; i < n; i++)
        {
            string gridItem = Console.ReadLine();
            grid.Add(gridItem);
        }

        int result = Result.twoPluses(grid);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
