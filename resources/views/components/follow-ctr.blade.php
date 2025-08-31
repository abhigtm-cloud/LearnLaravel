@props(['user'])

@auth
<div {{ $attributes }} x-data="{
    following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
    followerCount: {{ $user->follower()->count() }},
    follow() {
        axios.post('/follow/{{ $user->id }}')
            .then(res => {
                this.following = !this.following;
                this.followerCount = res.data.followerCount;
            })
            .catch(err => {
                console.log('Error:', err);
            })
    }
}">
    {{ $slot }} //confusion in the slot usage here
</div>
@else
<div {{ $attributes }}>
    {{ $slot }}
</div>
@endauth