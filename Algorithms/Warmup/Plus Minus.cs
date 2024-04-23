using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

class Result
{

    /*
     * Complete the 'plusMinus' function below.
     *
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static void plusMinus(List<int> arr)
    {
        int positive = 0, negative = 0, zero = 0;

        foreach(int i in arr)
        {
            if(i > 0)
                positive++;
            else if(i < 0)
                negative++;
            else
                zero++;
        }

        Console.WriteLine((double)positive / arr.Count);
        Console.WriteLine((double)negative / arr.Count);
        Console.WriteLine((double)zero / arr.Count);
    }

}

class Solution
{
    public static void Main(string[] args)
    {
        int n = Convert.ToInt32(Console.ReadLine().Trim());
        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();
        Result.plusMinus(arr);
    }
}
