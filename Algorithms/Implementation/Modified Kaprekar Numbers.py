#
# Complete the 'kaprekarNumbers' function below.
#
# The function accepts following parameters:
#  1. INTEGER p
#  2. INTEGER q
#

def kaprekarNumbers(p, q):
    # Write your code here
    kaprekar_nums = []
    for i in range(p, q + 1):
        sq = str(i**2)
        if len(sq) == 1:
            if i == 1:
                kaprekar_nums.append(i)
        else:
            if int(sq[: len(sq) // 2]) + int(sq[len(sq) // 2 :]) == i:
                kaprekar_nums.append(i)

    if kaprekar_nums:
        print(*kaprekar_nums)
    else:
        print("INVALID RANGE")

if __name__ == '__main__':
    p = int(input().strip())
    q = int(input().strip())

    kaprekarNumbers(p, q)
