import os

#
# Complete the catAndMouse function below.
#
def catAndMouse(x, y, z):
    #
    # Write your code here.
    #
    return 'Cat A' if abs(x-z) < abs(y-z) else 'Cat B' if abs(x-z) > abs(y-z) else 'Mouse C'


if __name__ == '__main__':
    f = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input())

    for q_itr in range(q):
        xyz = input().split()
        x = int(xyz[0])
        y = int(xyz[1])
        z = int(xyz[2])

        result = catAndMouse(x, y, z)
        f.write(result + '\n')

    f.close()
