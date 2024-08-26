using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'largestPermutation' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts following parameters:
     *  1. INTEGER k
     *  2. INTEGER_ARRAY arr
     */

    public static List<int> largestPermutation(int k, List<int> arr)
    {
        int n = arr.Count;

        Dictionary<int, int> valueToIndex = new Dictionary<int, int>();

        for (int i = 0; i < n; i++)
        {
            valueToIndex[arr[i]] = i;
        }

        for (int i = 0; i < n && k > 0; i++)
        {
            int targetValue = n - i;

            if (arr[i] == targetValue)
            {
                continue;
            }

            int targetIndex = valueToIndex[targetValue];

            valueToIndex[arr[i]] = targetIndex;
            valueToIndex[targetValue] = i;

            int temp = arr[i];
            arr[i] = arr[targetIndex];
            arr[targetIndex] = temp;

            k--;
        }

        return arr;
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

        List<int> result = Result.largestPermutation(k, arr);

        textWriter.WriteLine(String.Join(" ", result));
        textWriter.Flush();
        textWriter.Close();
    }
}
