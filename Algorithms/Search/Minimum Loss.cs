using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'minimumLoss' function below.
     *
     * The function is expected to return an INTEGER.
     * The function accepts LONG_INTEGER_ARRAY price as parameter.
     */

    public static int minimumLoss(List<long> price)
    {
        int n = price.Count;
        long minLoss = long.MaxValue;

        Dictionary<long, int> priceDict = new Dictionary<long, int>();
        for (int i = 0; i < n; i++)
        {
            priceDict[price[i]] = i;
        }

        List<long> sortedPrices = price.OrderBy(x => x).ToList();

        for (int i = 0; i < n - 1; i++)
        {
            long currentLoss = sortedPrices[i + 1] - sortedPrices[i];

            if (currentLoss < minLoss && priceDict[sortedPrices[i + 1]] < priceDict[sortedPrices[i]])
            {
                minLoss = currentLoss;
            }
        }

        return (int)minLoss;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<long> price = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(priceTemp => Convert.ToInt64(priceTemp)).ToList();

        int result = Result.minimumLoss(price);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
