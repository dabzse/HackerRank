#
# Complete the 'decentNumber' function below.
#
# The function accepts INTEGER n as parameter.
#

def decentNumber(n):
    # Write your code here
    number_of_fives = n - (n % 3)

    while number_of_fives >= 0:
        if (n - number_of_fives) % 5 == 0:
            print("5" * number_of_fives + "3" * (n - number_of_fives))
            return

        number_of_fives -= 3

    print(-1)

if __name__ == '__main__':
    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        decentNumber(n)
