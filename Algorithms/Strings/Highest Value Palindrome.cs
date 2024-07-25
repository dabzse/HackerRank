using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'highestValuePalindrome' function below.
     *
     * The function is expected to return a STRING.
     * The function accepts following parameters:
     *  1. STRING s
     *  2. INTEGER n
     *  3. INTEGER k
     */

    public static string highestValuePalindrome(string s, int n, int k)
    {
        int minNoOfChanges = 0;
        char[] sArray = s.ToCharArray();

        for (int i = 0; i < n / 2; i++)
        {
            if (sArray[i] != sArray[n - i - 1])
            {
                minNoOfChanges++;
            }
        }

        if (minNoOfChanges > k)
        {
            return "-1";
        }

        StringBuilder highestValuePalindrome = new StringBuilder();
        for (int i = 0; i < n / 2; i++)
        {
            if (k - minNoOfChanges > 1)
            {
                if (sArray[i] != sArray[n - i - 1])
                {
                    if (sArray[i] != '9' && sArray[n - i - 1] != '9')
                    {
                        highestValuePalindrome.Append('9');
                        k -= 2;
                    }
                    else
                    {
                        if (sArray[i] > sArray[n - i - 1])
                        {
                            highestValuePalindrome.Append(sArray[i]);
                        }
                        else
                        {
                            highestValuePalindrome.Append(sArray[n - i - 1]);
                        }
                        k--;
                    }
                    minNoOfChanges--;
                }
                else if (sArray[i] != '9')
                {
                    highestValuePalindrome.Append('9');
                    k -= 2;
                }
                else
                {
                    highestValuePalindrome.Append(sArray[i]);
                }
            }
            else if (k - minNoOfChanges == 1)
            {
                if (sArray[i] != sArray[n - i - 1])
                {
                    if (sArray[i] != '9' && sArray[n - i - 1] != '9')
                    {
                        highestValuePalindrome.Append('9');
                        k -= 2;
                    }
                    else
                    {
                        if (sArray[i] > sArray[n - i - 1])
                        {
                            highestValuePalindrome.Append(sArray[i]);
                        }
                        else
                        {
                            highestValuePalindrome.Append(sArray[n - i - 1]);
                        }
                        k--;
                    }
                    minNoOfChanges--;
                }
                else
                {
                    highestValuePalindrome.Append(sArray[i]);
                }
            }
            else if (sArray[i] != sArray[n - i - 1])
            {
                if (sArray[i] > sArray[n - i - 1])
                {
                    highestValuePalindrome.Append(sArray[i]);
                }
                else
                {
                    highestValuePalindrome.Append(sArray[n - i - 1]);
                }
                k--;
                minNoOfChanges--;
            }
            else
            {
                highestValuePalindrome.Append(sArray[i]);
            }
        }

        if (n % 2 == 1)
        {
            if (k > 0)
            {
                return highestValuePalindrome.ToString() + '9' + new string(highestValuePalindrome.ToString().Reverse().ToArray());
            }
            return highestValuePalindrome.ToString() + sArray[n / 2] + new string(highestValuePalindrome.ToString().Reverse().ToArray());
        }

        return highestValuePalindrome.ToString() + new string(highestValuePalindrome.ToString().Reverse().ToArray());
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] firstMultipleInput = Console.ReadLine().TrimEnd().Split(' ');

        int n = Convert.ToInt32(firstMultipleInput[0]);
        int k = Convert.ToInt32(firstMultipleInput[1]);

        string s = Console.ReadLine();

        string result = Result.highestValuePalindrome(s, n, k);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
