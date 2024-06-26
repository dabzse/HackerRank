using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

class Result
{

    /*
     * Complete the 'breakingRecords' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts INTEGER_ARRAY scores as parameter.
     */

    public static List<int> breakingRecords(List<int> scores)
    {
        int min = scores[0];
        int max = scores[0];
        int minCount = 0;
        int maxCount = 0;
        for (int i = 1; i < scores.Count; i++)
        {
            if (scores[i] > max)
            {
                max = scores[i];
                maxCount++;
            }
            if (scores[i] < min)
            {
                min = scores[i];
                minCount++;
            }
        }
        return new List<int> { maxCount, minCount };
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> scores = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(scoresTemp => Convert.ToInt32(scoresTemp)).ToList();

        List<int> result = Result.breakingRecords(scores);

        textWriter.WriteLine(String.Join(" ", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
