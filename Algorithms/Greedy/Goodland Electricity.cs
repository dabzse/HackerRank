using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'pylons' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER k
     *  2. INTEGER_ARRAY arr
     */

    public static int pylons(int k, List<int> arr)
    {
        int n = arr.Count;
        int pylons_count = 0;
        int i = 0;
        while (i < n)
        {
            int pylon_position = -1;
            for (int j = Math.Min(i + k - 1, n - 1); j >= Math.Max(i - k + 1, 0); j--)
            {
                if (arr[j] == 1)
                {
                    pylon_position = j;
                    break;
                }
            }

            if (pylon_position == -1)
            {
                return -1;
            }

            pylons_count += 1;
            i = pylon_position + k;
        }

        return pylons_count;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int k = Convert.ToInt32(firstMultipleInput[1]);

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        int result = Result.pylons(k, arr);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
