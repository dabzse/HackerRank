using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'chiefHopper' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts INTEGER_ARRAY arr as parameter.
     */

    public static int chiefHopper(List<int> arr)
    {
        int energy = 0;

        for (int i = arr.Count - 1; i >= 0; i--)
        {
            energy = (energy + arr[i] + 1) / 2;
        }

        return energy;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<int> arr = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(arrTemp => Convert.ToInt32(arrTemp)).ToList();

        int result = Result.chiefHopper(arr);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
