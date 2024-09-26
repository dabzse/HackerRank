using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'activityNotifications' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER_ARRAY expenditure
     *  2. INTEGER d
     */

    public static int activityNotifications(List<int> expenditure, int d)
    {
        int notifications = 0;
        int[] counts = new int[201];

        for (int i = 0; i < d; i++)
        {
            counts[expenditure[i]]++;
        }

        double FindMedian(int[] counts, int d)
        {
            int count = 0;
            int median1 = -1, median2 = -1;

            if (d % 2 == 1)
            {
                int medianPos1 = d / 2 + 1;
                for (int i = 0; i < counts.Length; i++)
                {
                    count += counts[i];
                    if (count >= medianPos1)
                    {
                        return i;
                    }
                }
            }
            else
            {
                int medianPos1 = d / 2;
                int medianPos2 = medianPos1 + 1;
                for (int i = 0; i < counts.Length; i++)
                {
                    count += counts[i];
                    if (count >= medianPos1 && median1 == -1)
                    {
                        median1 = i;
                    }
                    if (count >= medianPos2)
                    {
                        median2 = i;
                        break;
                    }
                }
                return (median1 + median2) / 2.0;
            }

            return 0.0;
        }

        for (int i = d; i < expenditure.Count; i++)
        {
            double median = FindMedian(counts, d);

            if (expenditure[i] >= 2 * median)
            {
                notifications++;
            }

            counts[expenditure[i]]++;
            counts[expenditure[i - d]]--;
        }

        return notifications;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int d = Convert.ToInt32(firstMultipleInput[1]);

        List<int> expenditure = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(expenditureTemp => Convert.ToInt32(expenditureTemp)).ToList();

        int result = Result.activityNotifications(expenditure, d);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
