using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'luckBalance' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER k
     *  2. 2D_INTEGER_ARRAY contests
     */

    public static int luckBalance(int k, List<List<int>> contests)
    {
        int luck = 0;
        List<int> importantContests = new List<int>();

        for (int i = 0; i < contests.Count; i++)
        {
            if (contests[i][1] == 0)
            {
                luck += contests[i][0];
            }
            else
            {
                importantContests.Add(contests[i][0]);
            }
        }

        importantContests.Sort();
        importantContests.Reverse();

        for (int i = 0; i < importantContests.Count; i++)
        {
            if (i < k)
            {
                luck += importantContests[i];
            }
            else
            {
                luck -= importantContests[i];
            }
        }

        return luck;
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

        List<List<int>> contests = new List<List<int>>();

        for (int i = 0; i < n; i++)
        {
            contests.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(contestsTemp => Convert.ToInt32(contestsTemp)).ToList());
        }

        int result = Result.luckBalance(k, contests);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
