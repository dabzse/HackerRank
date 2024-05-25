using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

class Solution {

    // Complete the jumpingOnClouds function below.
    static int jumpingOnClouds(int[] c, int k) {

        int n = c.Length;
        int energy = 100;
        int i = 0;

        while (true)
        {
            i += k;
            if (i >= n) i %= n;

            energy -= c[i] == 1 ? 2 : 0;
            energy--;

            if (i % n == 0) break;
        }
        return energy;
    }

    static void Main(string[] args) {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        string[] nk = Console.ReadLine().Split(' ');

        int n = Convert.ToInt32(nk[0]);
        int k = Convert.ToInt32(nk[1]);

        int[] c = Array.ConvertAll(Console.ReadLine().Split(' '), cTemp => Convert.ToInt32(cTemp))
        ;
        int result = jumpingOnClouds(c, k);

        textWriter.WriteLine(result);

        textWriter.Flush();
        textWriter.Close();
    }
}
