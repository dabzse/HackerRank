import os
import math

#
# Complete the 'encryption' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#


def encryption(s):
    # Write your code here
    s = s.replace(" ", "")

    n = len(s)
    row_length = math.floor(math.sqrt(n))
    col_length = math.ceil(math.sqrt(n))

    if row_length * col_length < n:
        row_length += 1

    grid = [""] * col_length

    for i, char in enumerate(s):
        grid[i % col_length] += char

    encrypted_message = " ".join(grid)

    return encrypted_message


if __name__ == "__main__":
    fptr = open(os.environ["OUTPUT_PATH"], "w")

    s = input()
    result = encryption(s)

    fptr.write(result + "\n")
    fptr.close()
