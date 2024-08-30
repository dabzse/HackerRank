using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'candies' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. INTEGER_ARRAY arr
     */

    public static long candies(int n, List<int> arr)
    {
        long sum = 0;
        long[] arr2 = new long[n];
        arr2[0] = 1;
        for (int i = 1; i < n; i++)
        {
            if (arr[i] > arr[i - 1])
            {
                arr2[i] = arr2[i - 1] + 1;
            }
            else
            {
                arr2[i] = 1;
            }
        }
        for (int i = n - 2; i >= 0; i--)
        {
            if (arr[i] > arr[i + 1] && arr2[i] <= arr2[i + 1])
            {
                arr2[i] = arr2[i + 1] + 1;
            }
        }
        for (int i = 0; i < n; i++)
        {
            sum += arr2[i];
        }
        return sum;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = new List<int>();

        for (int i = 0; i < n; i++)
        {
            int arrItem = Convert.ToInt32(Console.ReadLine().Trim());
            arr.Add(arrItem);
        }

        long result = Result.candies(n, arr);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
