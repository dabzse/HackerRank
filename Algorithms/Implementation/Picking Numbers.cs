using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'pickingNumbers' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY a as parameter.
     */

    public static int pickingNumbers(List<int> a)
    {
        Dictionary<int, int> dict = new Dictionary<int, int>();
        foreach (int num in a)
        {
            if (!dict.ContainsKey(num))
                dict[num] = 0;
            dict[num]++;
        }

        int max = 0;
        foreach (var pair in dict)
        {
            int currentKey = pair.Key;
            int currentValue = pair.Value;
            int nextValue = dict.ContainsKey(currentKey + 1) ? dict[currentKey + 1] : 0;
            max = Math.Max(max, currentValue + nextValue);
        }
        return max;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> a = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(aTemp => Convert.ToInt32(aTemp)).ToList();

        int result = Result.pickingNumbers(a);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
