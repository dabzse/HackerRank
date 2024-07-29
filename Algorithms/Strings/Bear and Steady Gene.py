import os

#
# Complete the 'steadyGene' function below.
#
# The function is expected to return an INTEGER.
# The function accepts STRING gene as parameter.
#

def steadyGene(gene):
    # Write your code here
    from collections import Counter

    n = len(gene)
    ideal_count = n // 4
    count = Counter(gene)

    excess = {char: max(0, count[char] - ideal_count) for char in "ACGT"}

    if all(v == 0 for v in excess.values()):
        return 0

    min_length = (n)

    left = 0

    for right in range(n):
        count[gene[right]] -= 1

        while all(count[char] <= ideal_count for char in "ACGT"):
            min_length = min(min_length, right - left + 1)
            count[gene[left]] += 1
            left += 1

    return min_length


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())
    gene = input()

    result = steadyGene(gene)

    fptr.write(str(result) + '\n')
    fptr.close()
