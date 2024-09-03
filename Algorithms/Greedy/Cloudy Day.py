import os

#
# Complete the 'maximumPeople' function below.
#
# The function is expected to return a LONG_INTEGER.
# The function accepts following parameters:
#  1. LONG_INTEGER_ARRAY p
#  2. LONG_INTEGER_ARRAY x
#  3. LONG_INTEGER_ARRAY y
#  4. LONG_INTEGER_ARRAY r
#

def maximumPeople(p, x, y, r):
    # Return the maximum number of people that will be in a sunny town after removing exactly one cloud.
    events = []

    for i, (yi, ri) in enumerate(zip(y, r)):
        events.append((yi - ri, "start", i))
        events.append((yi + ri + 1, "end", i))

    towns = sorted(zip(x, p))
    events.sort()

    sunny_population = 0
    covered_by_clouds = 0
    cloud_effects = [0] * len(y)
    town_index = 0
    unique_coverage = [0] * len(y)

    current_coverage = set()

    for pos, event_type, cloud_index in events:
        while town_index < len(towns) and towns[town_index][0] < pos:
            town_position, town_population = towns[town_index]
            if len(current_coverage) == 0:
                sunny_population += town_population
            elif len(current_coverage) == 1:
                only_cloud = list(current_coverage)[0]
                cloud_effects[only_cloud] += town_population
            town_index += 1

        if event_type == "start":
            current_coverage.add(cloud_index)
        elif event_type == "end":
            current_coverage.remove(cloud_index)

    while town_index < len(towns):
        town_position, town_population = towns[town_index]
        if len(current_coverage) == 0:
            sunny_population += town_population
        elif len(current_coverage) == 1:
            only_cloud = list(current_coverage)[0]
            cloud_effects[only_cloud] += town_population
        town_index += 1

    max_sunny_population = sunny_population + max(cloud_effects)

    return max_sunny_population


if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input().strip())

    p = list(map(int, input().rstrip().split()))
    x = list(map(int, input().rstrip().split()))

    m = int(input().strip())

    y = list(map(int, input().rstrip().split()))
    r = list(map(int, input().rstrip().split()))

    result = maximumPeople(p, x, y, r)

    fptr.write(str(result) + '\n')
    fptr.close()
