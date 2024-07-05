using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'minimumNumber' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts following parameters:
     *  1. INTEGER n
     *  2. STRING password
     */

    public static int minimumNumber(int n, string password)
    {
        // Return the minimum number of characters to make the password strong

        string lower = "abcdefghijklmnopqrstuvwxyz";
        string upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        string numbers = "0123456789";
        string special = "!@#$%^&*()-_=+`~,. ";

        int missingLower = 1;
        int missingUpper = 1;
        int missingNumber = 1;
        int missingSpecial = 1;

        foreach (char c in password)
        {
            if (lower.Contains(c))
            {
                missingLower = 0;
            }
            else if (upper.Contains(c))
            {
                missingUpper = 0;
            }
            else if (numbers.Contains(c))
            {
                missingNumber = 0;
            }
            else if (special.Contains(c))
            {
                missingSpecial = 0;
            }
        }

        int missingCount = missingLower + missingUpper + missingNumber + missingSpecial;

        return Math.Max(missingCount, 6 - password.Length);
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        string password = Console.ReadLine();

        int answer = Result.minimumNumber(n, password);

        textWriter.WriteLine(answer);

        textWriter.Flush();
        textWriter.Close();
    }
}
