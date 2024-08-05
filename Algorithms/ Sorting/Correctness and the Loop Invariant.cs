using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;

class Solution
{
    public static void insertionSort(int[] A)
    {
        for (int i = 1; i < A.Length; ++i)
        {
            int key = A[i];
            int j = i - 1;
            while (j >= 0 && A[j] > key)
            {
                A[j + 1] = A[j];
                j = j - 1;
            }
            A[j + 1] = key;
        }
    }

    static void Main(string[] args)
    {
        int count = Convert.ToInt32(Console.ReadLine());
        int[] _ar = Array.ConvertAll(Console.ReadLine().Split(), int.Parse);
        insertionSort(_ar);
        Console.WriteLine(String.Join(" ", _ar));
    }
}

