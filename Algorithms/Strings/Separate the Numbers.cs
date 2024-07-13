using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'separateNumbers' function below.
     *
     * The function accepts STRING s as parameter.
     */

    public static void separateNumbers(string s)
    {
        if (string.IsNullOrEmpty(s))
        {
            Console.WriteLine("NO");
            return;
        }

        for (int i = 1; i <= s.Length / 2; i++)
        {
            string firstStr = s.Substring(0, i);

            if (!long.TryParse(firstStr, out long firstNum))
            {
                continue;
            }

            string remaining = s.Substring(i);
            while (remaining.Length > 0)
            {
                long nextNum = firstNum + 1;
                string nextNumStr = nextNum.ToString();
                if (remaining.StartsWith(nextNumStr))
                {
                    firstNum = nextNum;
                    remaining = remaining.Substring(nextNumStr.Length);
                }
                else break;
            }
            if (remaining.Length == 0)
            {
                Console.WriteLine("YES " + firstStr);
                return;
            }
        }
        Console.WriteLine("NO");
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        int q = Convert.ToInt32(Console.ReadLine().Trim());

        for (int qItr = 0; qItr < q; qItr++)
        {
            string s = Console.ReadLine();

            Result.separateNumbers(s);
        }
    }
}
