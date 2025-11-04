def countResponseTimeRegressions(responseTimes):
    # Write your code here
    regressions = 0
    prefix_sum = 0

    for i in range(len(responseTimes)):
        if i > 0:
            avg = prefix_sum / i
            if responseTimes[i] > avg:
                regressions += 1
        prefix_sum += responseTimes[i]

    return regressions


# or you can use a better solution: using enumerate instead of range

def countResponseTimeRegressions(responseTimes):
    # Write your code here
    regressions = 0
    prefix_sum = 0

    for i, response_time in enumerate(responseTimes):
        if i > 0:
            avg = prefix_sum / i
            if response_time > avg:
                regressions += 1
        prefix_sum += response_time

    return regressions
