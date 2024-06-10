using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'acmTeam' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts STRING_ARRAY topic as parameter.
     */

    public static List<int> acmTeam(List<string> topic)
    {
        int maxTopics = 0;
        int teamCount = 0;

        for (int i = 0; i < topic.Count - 1; i++)
        {
            for (int j = i + 1; j < topic.Count; j++)
            {
                int count = 0;
                for (int k = 0; k < topic[i].Length; k++)
                {
                    if (topic[i][k] == '1' || topic[j][k] == '1')
                    {
                        count++;
                    }
                }

                if (count > maxTopics)
                {
                    maxTopics = count;
                    teamCount = 1;
                }
                else if (count == maxTopics)
                {
                    teamCount++;
                }
            }
        }

        return new List<int> { maxTopics, teamCount };
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int m = Convert.ToInt32(firstMultipleInput[1]);

        List<string> topic = new List<string>();

        for (int i = 0; i < n; i++)
        {
            string topicItem = Console.ReadLine();
            topic.Add(topicItem);
        }

        List<int> result = Result.acmTeam(topic);

        textWriter.WriteLine(String.Join("\n", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
