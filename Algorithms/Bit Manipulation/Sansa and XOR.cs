using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'sansaXor' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static int sansaXor(List<int> arr)
    {
        int n = arr.Count;

        if (n % 2 == 0)
        {
            return 0;
        }
        else
        {
            int result = 0;
            for (int i = 0; i < n; i += 2)
            {
                result ^= arr[i];
            }
            return result;
        }
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

            List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

            int result = Result.sansaXor(arr);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
