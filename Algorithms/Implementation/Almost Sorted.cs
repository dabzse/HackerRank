using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'almostSorted' function below.
     *
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static void almostSorted(List<int> arr)
    {
        int n = arr.Count;
        List<int> sortedArr = new List<int>(arr);
        sortedArr.Sort();

        if (arr.SequenceEqual(sortedArr))
        {
            Console.WriteLine("yes");
            return;
        }

        int l = 0;
        int r = n - 1;

        while (l < n && arr[l] == sortedArr[l])
        {
            l++;
        }
        while (r >= 0 && arr[r] == sortedArr[r])
        {
            r--;
        }

        (arr[l], arr[r]) = (arr[r], arr[l]);

        if (arr.SequenceEqual(sortedArr))
        {
            Console.WriteLine("yes");
            Console.WriteLine($"swap {l + 1} {r + 1}");
            return;
        }

        (arr[l], arr[r]) = (arr[r], arr[l]);

        List<int> subArray = arr.GetRange(l, r - l + 1);
        subArray.Reverse();

        if (arr.Take(l).Concat(subArray).Concat(arr.Skip(r + 1)).SequenceEqual(sortedArr))
        {
            Console.WriteLine("yes");
            Console.WriteLine($"reverse {l + 1} {r + 1}");
            return;
        }

        Console.WriteLine("no");
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        Result.almostSorted(arr);
    }
}
