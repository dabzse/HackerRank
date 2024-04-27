using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;

class Result
{

    /*
     * Complete the 'timeConversion' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts STRING s as parameter.
     */

    public static string timeConversion(string s)
    {
        string[] time = s.Split(':');
        string hour = time[0];
        string minute = time[1];
        string second = time[2].Substring(0, 2);
        string AMorPM = time[2].Substring(2, 2);

        if (AMorPM == "PM")
        {
            if (hour != "12")
            {
                hour = (int.Parse(hour) + 12).ToString();
            }
        }
        else if (AMorPM == "AM")
        {
            if (hour == "12")
            {
                hour = "00";
            }
        }
        return $"{hour}:{minute}:{second}";
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string s = Console.ReadLine();

        string result = Result.timeConversion(s);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
