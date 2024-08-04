using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System;

class Result
{

    /*
     * Complete the 'quickSort' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static List<int> quickSort(List<int> arr)
    {
        if (arr.Count <= 1) {
            return arr;
        }
        int pivotIndex = arr.Count / 2;
        int pivot = arr[pivotIndex];
        arr.RemoveAt(pivotIndex);
        List<int> left = new List<int>();
        List<int> right = new List<int>();
        foreach (int num in arr)
        {
            if (num <= pivot)
            {
                left.Add(num);
            }
            else
            {
                right.Add(num);
            }
        }
        List<int> sorted = new List<int>();
        sorted.AddRange(quickSort(left));
        sorted.Add(pivot);
        sorted.AddRange(quickSort(right));
        return sorted;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        List<int> result = Result.quickSort(arr);

        textWriter.WriteLine(String.Join(" ", result));

        textWriter.Flush();
        textWriter.Close();
    }
}

