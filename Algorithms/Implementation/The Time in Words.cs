using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'timeInWords' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. INTEGER h
     *  2. INTEGER m
     */

    public static string timeInWords(int h, int m)
    {
        string[] numbers = {
            "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
            "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen",
            "nineteen", "twenty", "twenty one", "twenty two", "twenty three", "twenty four", "twenty five",
            "twenty six", "twenty seven", "twenty eight", "twenty nine"
        };

        if (m == 0)
        {
            return $"{numbers[h]} o' clock";
        }
        else if (m == 15)
        {
            return $"quarter past {numbers[h]}";
        }
        else if (m == 30)
        {
            return $"half past {numbers[h]}";
        }
        else if (m == 45)
        {
            return $"quarter to {numbers[(h % 12) + 1]}";
        }
        else if (m < 30)
        {
            string minuteWord = m == 1 ? "minute" : "minutes";
            return $"{numbers[m]} {minuteWord} past {numbers[h]}";
        }
        else
        {
            string minuteWord = (60 - m) == 1 ? "minute" : "minutes";
            return $"{numbers[60 - m]} {minuteWord} to {numbers[(h % 12) + 1]}";
        }
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int h = Convert.ToInt32(Console.ReadLine().Trim());
        int m = Convert.ToInt32(Console.ReadLine().Trim());
        string result = Result.timeInWords(h, m);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
