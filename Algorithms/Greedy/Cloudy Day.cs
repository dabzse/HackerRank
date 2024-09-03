using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'maximumPeople' function below.
     *
     * The function is expected to return a LONG_INTEGER.
     * The function accepts following parameters:
     *  1. LONG_INTEGER_ARRAY p
     *  2. LONG_INTEGER_ARRAY x
     *  3. LONG_INTEGER_ARRAY y
     *  4. LONG_INTEGER_ARRAY r
     */

    public static long maximumPeople(List<long> p, List<long> x, List<long> y, List<long> r)
    {
        // Return the maximum number of people that will be in a sunny town after removing exactly one cloud.
        int n = p.Count;
        int m = y.Count;

        List<(long position, string type, int cloudIndex)> events = new List<(long, string, int)>();

        for (int i = 0; i < m; i++)
        {
            long left = y[i] - r[i];
            long right = y[i] + r[i];
            events.Add((left, "start", i));
            events.Add((right + 1, "end", i));
        }

        List<(long position, long population)> towns = x.Zip(p, (xi, pi) => (xi, pi)).OrderBy(town => town.xi).ToList();

        events = events.OrderBy(e => e.position).ToList();

        long sunnyPopulation = 0;
        long[] cloudEffects = new long[m];
        int townIndex = 0;
        Dictionary<int, bool> currentCoverage = new Dictionary<int, bool>();

        foreach (var ev in events)
        {
            long pos = ev.position;
            string eventType = ev.type;
            int cloudIndex = ev.cloudIndex;

            while (townIndex < n && towns[townIndex].position < pos)
            {
                long townPopulation = towns[townIndex].population;

                if (currentCoverage.Count == 0)
                {
                    sunnyPopulation += townPopulation;
                }
                else if (currentCoverage.Count == 1)
                {
                    int onlyCloud = currentCoverage.Keys.First();
                    cloudEffects[onlyCloud] += townPopulation;
                }

                townIndex++;
            }

            if (eventType == "start")
            {
                currentCoverage[cloudIndex] = true;
            }
            else if (eventType == "end")
            {
                currentCoverage.Remove(cloudIndex);
            }
        }

        while (townIndex < n)
        {
            long townPopulation = towns[townIndex].population;

            if (currentCoverage.Count == 0)
            {
                sunnyPopulation += townPopulation;
            }
            else if (currentCoverage.Count == 1)
            {
                int onlyCloud = currentCoverage.Keys.First();
                cloudEffects[onlyCloud] += townPopulation;
            }

            townIndex++;
        }

        long maxSunnyPopulation = sunnyPopulation + cloudEffects.Max();

        return maxSunnyPopulation;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<long> p = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(pTemp => Convert.ToInt64(pTemp)).ToList();
        List<long> x = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(xTemp => Convert.ToInt64(xTemp)).ToList();

        int m = Convert.ToInt32(Console.ReadLine().Trim());

        List<long> y = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(yTemp => Convert.ToInt64(yTemp)).ToList();
        List<long> r = Console.ReadLine().TrimEnd().Split(' ').ToList().Select(rTemp => Convert.ToInt64(rTemp)).ToList();

        long result = Result.maximumPeople(p, x, y, r);

        textWriter.WriteLine(result);
        textWriter.Flush();
        textWriter.Close();
    }
}
