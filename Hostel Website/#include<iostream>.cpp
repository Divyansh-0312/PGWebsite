#include<iostream>
#include<climits>
using namespace std;

int main()
{
    int n;
    cin>>n;
    int arr[n];
    for(int i=0; i<n; i++)
    {
        cin>>arr[i];
    }
    for(int i=0; i<n; i++)
    {
        for(int k=i; k<=i; k++)
        {
            cout<<arr[k];
        }
        cout<<endl;
    }
    return 0;
}