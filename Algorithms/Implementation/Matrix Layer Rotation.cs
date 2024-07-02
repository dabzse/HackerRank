using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'matrixRotation' function below.
     *
     * The function accepts following parameters:
     *  1. 2D_INTEGER_ARRAY matrix
     *  2. INTEGER r
     */

    public static void matrixRotation(List<List<int>> matrix, int r)
    {
        int m = matrix.Count;
        int n = matrix[0].Count;
        int num_layers = Math.Min(m, n) / 2;

        for (int layer = 0; layer < num_layers; layer++)
        {
            List<int> layer_elements = new List<int>();

            for (int j = layer; j < n - layer; j++)
            {
                layer_elements.Add(matrix[layer][j]);
            }

            for (int i = layer + 1; i < m - layer; i++)
            {
                layer_elements.Add(matrix[i][n - layer - 1]);
            }

            for (int j = n - layer - 2; j >= layer; j--)
            {
                layer_elements.Add(matrix[m - layer - 1][j]);
            }

            for (int i = m - layer - 2; i > layer; i--)
            {
                layer_elements.Add(matrix[i][layer]);
            }

            int effective_rotations = r % layer_elements.Count;
            List<int> rotated_elements = layer_elements.Skip(effective_rotations).Concat(layer_elements.Take(effective_rotations)).ToList();

            int idx = 0;

            for (int j = layer; j < n - layer; j++)
            {
                matrix[layer][j] = rotated_elements[idx++];
            }

            for (int i = layer + 1; i < m - layer; i++)
            {
                matrix[i][n - layer - 1] = rotated_elements[idx++];
            }

            for (int j = n - layer - 2; j >= layer; j--)
            {
                matrix[m - layer - 1][j] = rotated_elements[idx++];
            }

            for (int i = m - layer - 2; i > layer; i--)
            {
                matrix[i][layer] = rotated_elements[idx++];
            }
        }

        foreach (var row in matrix)
        {
            Console.WriteLine(string.Join(" ", row));
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int m = Convert.ToInt32(firstMultipleInput[0]);
        int n = Convert.ToInt32(firstMultipleInput[1]);
        int r = Convert.ToInt32(firstMultipleInput[2]);

        List<List<int>> matrix = new List<List<int>>();

        for (int i = 0; i < m; i++)
        {
            matrix.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(matrixTemp => Convert.ToInt32(matrixTemp)).ToList());
        }

        Result.matrixRotation(matrix, r);
    }
}
