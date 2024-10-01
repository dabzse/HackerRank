import os

#
# Complete the 'minimumLoss' function below.
#
# The function is expected to return an INTEGER.
# The function accepts LONG_INTEGER_ARRAY price as parameter.
#

def minimumLoss(price):
    # Write your code here
    min_loss = float("inf")
    price_dict = {
        price[i]: i for i in range(len(price))
    }
    sorted_prices = sorted(price)

    for i in range(len(sorted_prices) - 1):
        current_loss = sorted_prices[i + 1] - sorted_prices[i]
        if (
            current_loss < min_loss
            and price_dict[sorted_prices[i + 1]] < price_dict[sorted_prices[i]]
        ):
            min_loss = current_loss

    return min_loss


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    price = list(map(int, input().rstrip().split()))

    result = minimumLoss(price)

    fptr.write(str(result) + '\n')
    fptr.close()
