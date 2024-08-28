using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

class Result
{

    /*
     * Complete the 'jimOrders' function below.
     *
     * The function is expected to return an INTEGER_ARRAY.
     * The function accepts 2D_INTEGER_ARRAY orders as parameter.
     */

    public static List<int> jimOrders(List<List<int>> orders)
    {
        List<(int id, int totalTime)> orderDetails = new List<(int id, int totalTime)>();

        for (int i = 0; i < orders.Count; i++)
        {
            int totalTime = orders[i][0] + orders[i][1];
            orderDetails.Add((i + 1, totalTime));
        }

        orderDetails.Sort((x, y) =>
            x.totalTime == y.totalTime ? x.id.CompareTo(y.id) : x.totalTime.CompareTo(y.totalTime)
        );

        List<int> result = orderDetails.Select(order => order.id).ToList();

        return result;
    }
}

class Solution
{
    public static void Main(string[] args)
    {
        TextWriter textWriter = new StreamWriter(@System.Environment.GetEnvironmentVariable("OUTPUT_PATH"), true);

        int n = Convert.ToInt32(Console.ReadLine().Trim());

        List<List<int>> orders = new List<List<int>>();

        for (int i = 0; i < n; i++)
        {
            orders.Add(Console.ReadLine().TrimEnd().Split(' ').ToList().Select(ordersTemp => Convert.ToInt32(ordersTemp)).ToList());
        }

        List<int> result = Result.jimOrders(orders);

        textWriter.WriteLine(String.Join(" ", result));

        textWriter.Flush();
        textWriter.Close();
    }
}
