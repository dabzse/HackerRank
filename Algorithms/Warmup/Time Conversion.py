import os

#
# Complete the 'timeConversion' function below.
#
# The function is expected to return a STRING.
# The function accepts STRING s as parameter.
#

def timeConversion(s):
    # Write your code here
    time_parts = s.split(':')
    if 'PM' in s:
        if time_parts[0] == '12':
            time_parts[0] = '12'
        else:
            time_parts[0] = str(int(time_parts[0]) + 12)
    else:
        if time_parts[0] == '12':
            time_parts[0] = '00'
    return ":".join(time_parts[:-1]) + ":" + time_parts[-1][:-2]


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')
    s = input()
    result = timeConversion(s)
    fptr.write(result + '\n')
    fptr.close()
