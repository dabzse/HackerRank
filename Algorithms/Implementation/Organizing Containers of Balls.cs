using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'organizingContainers' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts 2D_INTEGER_ARRAY container as parameter.
     */

    public static string organizingContainers(List<List<int>> container)
    {
        int[] containerSize = new int[container.Count];
        int[] ballTypeCount = new int[container.Count];
        for (int i = 0; i < container.Count; i++)
        {
            for (int j = 0; j < container.Count; j++)
            {
                containerSize[i] += container[i][j];
                ballTypeCount[j] += container[i][j];
            }
        }

        Array.Sort(containerSize);
        Array.Sort(ballTypeCount);

        for (int i = 0; i < container.Count; i++)
        {
            if (containerSize[i] != ballTypeCount[i])
            {
                return "Impossible";
            }
        }
        return "Possible";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int q = Convert.ToInt32(Console.ReadLine().Trim());

        for (int qItr = 0; qItr < q; qItr++)
        {
            int n = Convert.ToInt32(Console.ReadLine().Trim());

            List<List<int>> container = new List<List<int>>();

            for (int i = 0; i < n; i++)
            {
                container.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(containerTemp => Convert.ToInt32(containerTemp)).ToList());
            }

            string result = Result.organizingContainers(container);

            textWriter.WriteLine(result);
        }

        textWriter.Flush();
        textWriter.Close();
    }
}
