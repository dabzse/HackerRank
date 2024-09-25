using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'lilysHomework' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    private static int CountSwaps(List<int> arr, List<int> sortedArr)
    {
        int swaps = 0;
        int n = arr.Count;
        bool[] visited = new bool[n];
        Dictionary<int, int> valueToIndex = new Dictionary<int, int>();

        for (int i = 0; i < n; i++)
        {
            valueToIndex[sortedArr[i]] = i;
        }

        for (int i = 0; i < n; i++)
        {
            if (visited[i] || arr[i] == sortedArr[i])
                continue;

            int cycleSize = 0;
            int j = i;
            while (!visited[j])
            {
                visited[j] = true;
                j = valueToIndex[arr[j]];
                cycleSize++;
            }

            if (cycleSize > 1)
                swaps += (cycleSize - 1);
        }

        return swaps;
    }

    public static int lilysHomework(List<int> arr)
    {
        List<int> ascendingArr = new List<int>(arr);
        List<int> descendingArr = new List<int>(arr);

        ascendingArr.Sort();
        descendingArr.Sort((a, b) => b.CompareTo(a));

        return Math.Min(CountSwaps(arr, ascendingArr), CountSwaps(arr, descendingArr));
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        int result = Result.lilysHomework(arr);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
