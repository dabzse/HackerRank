#
# Complete the 'separateNumbers' function below.
#
# The function accepts STRING s as parameter.
#

def separateNumbers(s):
    # Write your code here
    for i in range(1, len(s) // 2 + 1):
        first_num = s[:i]
        current_num = int(first_num)
        remaining = s[i:]
        while remaining:
            next_num = str(current_num + 1)
            if remaining.startswith(next_num):
                current_num = int(next_num)
                remaining = remaining[len(next_num) :]
            else:
                break
        if not remaining:
            print("YES", first_num)
            return
    print("NO")

if __name__ == '__main__':
    q = int(input().strip())

    for q_itr in range(q):
        s = input()

        separateNumbers(s)
