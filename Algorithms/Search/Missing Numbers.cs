using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'missingNumbers' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY arr
     *  2. INTEGER_ARRAY brr
     */

    public static List<int> missingNumbers(List<int> arr, List<int> brr)
    {
        List<int> result = new List<int>();
        Dictionary<int, int> frequencyMap = new Dictionary<int, int>();

        foreach (int num in brr)
        {
            if (frequencyMap.ContainsKey(num))
            {
                frequencyMap[num]++;
            }
            else
            {
                frequencyMap[num] = 1;
            }
        }

        foreach (int num in arr)
        {
            if (frequencyMap.ContainsKey(num))
            {
                frequencyMap[num]--;
                if (frequencyMap[num] == 0)
                {
                    frequencyMap.Remove(num);
                }
            }
        }

        result = frequencyMap.Keys.ToList();
        result.Sort();

        return result;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        int m = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> brr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(brrTemp => Convert.ToInt32(brrTemp)).ToList();

        List<int> result = Result.missingNumbers(arr, brr);

        textWriter.WriteLine(String.Join(" ", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
