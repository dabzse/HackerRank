using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

class Result
{

    /*
     * Complete the 'miniMaxSum' function below.
     *
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static void miniMaxSum(List<int> arr)
    {
        long min = 0, max = 0;
        // Array.Sort(arr.ToArray()); // this sorting fails, don't use it
        arr.Sort();
        for (int i = 0; i < arr.Count - 1; i++)
            min += arr[i];
        for (int i = 1; i < arr.Count; i++)
            max += arr[i];
        Console.WriteLine($"{min} {max}");
    }

}

class Solution
{
    public static void Main(string[] args)
    {

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();
        Result.miniMaxSum(arr);
    }
}
