using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'migratoryBirds' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static int migratoryBirds(List<int> arr)
    {
        int max = 0;
        int result = 0;
        Dictionary<int, int> dict = new Dictionary<int, int>();

        foreach (var item in arr)
        {
            if (dict.ContainsKey(item))
            {
                dict[item]++;
            }
            else
            {
                dict.Add(item, 1);
            }
        }

        foreach (var item in dict)
        {
            if (item.Value > max)
            {
                max = item.Value;
                result = item.Key;
            }
            else if (item.Value == max && item.Key < result)
            {
                result = item.Key;
            }
        }
        return result;
    }

}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int arrCount = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        int result = Result.migratoryBirds(arr);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
