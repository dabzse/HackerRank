import os

#
# Complete the 'highestValuePalindrome' function below.
#
# The function is expected to return a STRING.
# The function accepts following parameters:
#  1. STRING s
#  2. INTEGER n
#  3. INTEGER k
#


def highestValuePalindrome(s, n, k):
    # Write your code here
    min_no_of_changes = 0
    for i in range(n // 2):
        if s[i] != s[n - i - 1]:
            min_no_of_changes += 1

    if min_no_of_changes > k:
        return "-1"

    highest_value_palindrome = ""
    for i in range(n // 2):
        if k - min_no_of_changes > 1:
            if s[i] != s[n - i - 1]:
                if s[i] != "9" and s[n - i - 1] != "9":
                    highest_value_palindrome += "9"
                    k -= 2
                else:
                    if s[i] > s[n - i - 1]:
                        highest_value_palindrome += s[i]
                    else:
                        highest_value_palindrome += s[n - i - 1]
                    k -= 1
                min_no_of_changes -= 1
            elif s[i] != "9":
                highest_value_palindrome += "9"
                k -= 2
            else:
                highest_value_palindrome += s[i]
        elif k - min_no_of_changes == 1:
            if s[i] != s[n - i - 1]:
                if s[i] != "9" and s[n - i - 1] != "9":
                    highest_value_palindrome += "9"
                    k -= 2
                else:
                    if s[i] > s[n - i - 1]:
                        highest_value_palindrome += s[i]
                    else:
                        highest_value_palindrome += s[n - i - 1]
                    k -= 1
                min_no_of_changes -= 1
            else:
                highest_value_palindrome += s[i]
        elif (
            s[i] != s[n - i - 1]
        ):
            if s[i] > s[n - i - 1]:
                highest_value_palindrome += s[i]
            else:
                highest_value_palindrome += s[n - i - 1]
            k -= 1
            min_no_of_changes -= 1
        else:
            highest_value_palindrome += s[i]
    if n & 1:
        if k > 0:
            return highest_value_palindrome + "9" + highest_value_palindrome[::-1]
        return highest_value_palindrome + s[n // 2] + highest_value_palindrome[::-1]

    return highest_value_palindrome + highest_value_palindrome[::-1]


if __name__ == "__main__":
    fptr = open(os.environ["OUTPUT_PATH"], "w")

    first_multiple_input = input().rstrip().split()

    n = int(first_multiple_input[0])
    k = int(first_multiple_input[1])
    s = input()

    result = highestValuePalindrome(s, n, k)

    fptr.write(result + "\n")
    fptr.close()
